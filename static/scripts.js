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
        if(response.headers.get('content-type') !== 'application/json; charset=utf-8'){
            popup('error', 'Error: not json returned');
            const loading = document.getElementById('loading');

            loading.classList.add('hidden');
        }
        let res = response.json();
        return res;
    }, error => {
        console.log(error);
        const loading = document.getElementById('loading');

        loading.classList.add('hidden');
    }).then(res => {
        const loading = document.getElementById('loading');

        loading.classList.add('hidden');

        str = "";
        res.forEach(element => {
            str += "Элемент:" + element['name'];
        });
        const container = document.getElementById('content_container');
        container.innerHTML = str;
    })
}
function showCreateForm(){
    const container = document.getElementById('content_container');
}