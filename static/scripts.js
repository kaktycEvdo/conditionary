function popup(style, content){
    const popup_window = document.createElement('div');
    const popup_content = document.createElement('p');
    popup_content.innerHTML = content;
    popup_window.className = "popup_window "+style;

    popup_window.appendChild(popup_content);

    document.body.appendChild(popup_window);

    function deletePopup(){
        document.body.removeChild(popup_window);

        delete popup_window;
        delete popup_content;
    }

    const timeout = setTimeout(deletePopup, 5000);

    popup_window.addEventListener('click', () => {
        clearTimeout(timeout);
        deletePopup();
    })
}

function dofetching(item, command){
    const loading = document.getElementById('loading');

    loading.classList.remove('hidden');
    fetch('manage.php?item='+item+'&command='+command).
    then(response => {
        if(response.headers.get('content-type') === 'application/json; charset=utf-8'){
            const loading = document.getElementById('loading');
            loading.classList.add('hidden');
            let res = response.json();

            return [1, res];
        }
        else if(response.headers.get('content-type') === 'text/html; charset=utf-8'){
            const loading = document.getElementById('loading');
            loading.classList.add('hidden');
            let res = response.text();

            return [0, res];
        }
        
    }, error => {
        console.log(error);
        const loading = document.getElementById('loading');

        loading.classList.add('hidden');
    }).then(res => {
        if(res[0] == 0){
            res[1].then(data => {
                const container = document.getElementById('content_container');
                container.innerHTML = data;
            });
        }
        else if(res[0] == 1){
            res[1].then(data => {
                str = "";
                data.forEach(element => {
                    str += "Элемент:" + element['name'];
                });
                const container = document.getElementById('content_container');
                container.innerHTML = str;
            });
        }
    })
}
function sendPostProduct(){
    // id, name, description, category, producer, country, price, quantity, image
    let formData = new FormData(document.getElementById('newProductForm'));

    fetch("manage.php?command=newProduct&item=products", {
        method: "POST",
        body: formData
    }).then(res => {
        return res.text();
    }).then(res => {
        if(res != ''){
            const container = document.getElementById('debug_container');
            container.innerHTML = container.innerHTML+res;
        }
    });
}