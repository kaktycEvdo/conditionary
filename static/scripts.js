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

function displayNewForm(item){
    const loading = document.getElementById('loading');

    loading.classList.remove('hidden');
    fetch('manage.php?item='+item+'&command=newForm').
    then(response => {
        if(response.headers.get('content-type') === 'text/html; charset=utf-8'){
            const loading = document.getElementById('loading');
            loading.classList.add('hidden');
            let res = response.text();

            return res;
        }
        
    }, error => {
        console.log(error);
        const loading = document.getElementById('loading');

        loading.classList.add('hidden');
    }).then(res => {
        const container = document.getElementById('content_container');
        container.innerHTML = res;
    }).then(() => {
        let i_radio = document.getElementById('ingredient');
        let t_radio = document.getElementById('tool');
        let ingredient_fields = document.getElementsByClassName('ingredient-field');
        let tool_fields = document.getElementsByClassName('tool-field');

        i_radio.addEventListener('change', () => {
            for(let i = 0; i < ingredient_fields.length; i++){
                ingredient_fields[i].classList.remove('hidden');
            }
            for(let i = 0; i < tool_fields.length; i++){
                tool_fields[i].classList.add('hidden');
            }
        });
        t_radio.addEventListener('change', () => {
            for(let i = 0; i < tool_fields.length; i++){
                tool_fields[i].classList.remove('hidden');
            }
            for(let i = 0; i < ingredient_fields.length; i++){
                ingredient_fields[i].classList.add('hidden');
            }
        });
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
function addToBasket(e){
    const link = document.getElementsByClassName('order_link')[0];
    let numbers = Number(link.innerHTML.replace(/\D/g, ""));
    numbers+=1;
    link.innerHTML = 'Корзина ('+numbers+')';
    let id = e.target.classList[3];
    
    fetch("manage.php?command=addToBasket&item=products&id="+id)
    .then(res => {
        return res.text();
    }).then(res => {
        if(res != ''){
            const container = document.getElementById('debug_container');
            container.innerHTML = container.innerHTML+res;
        }
    });
}
function removeFromBasket(e){
    const link = document.getElementsByClassName('order_link')[0];
    let numbers = Number(link.innerHTML.replace(/\D/g, ""));
    numbers-=1;
    link.innerHTML = 'Корзина ('+numbers+')';
    let id = e.target.classList[3];
    
    fetch("manage.php?command=removeFromBasket&item=products&id="+id)
    .then(res => {
        return res.text();
    }).then(res => {
        if(res != ''){
            const container = document.getElementById('debug_container');
            container.innerHTML = container.innerHTML+res;
        }
    });
}
function clearBasket(){
    const link = document.getElementsByClassName('order_link')[0];
    let numbers = Number(link.innerHTML.replace(/\D/g, ""));
    numbers=0;
    link.innerHTML = 'Корзина ('+numbers+')';
    
    fetch("manage.php?command=clearBasket&item=products")
    .then(res => {
        return res.text();
    }).then(res => {
        if(res != ''){
            const container = document.getElementById('debug_container');
            container.innerHTML = container.innerHTML+res;
        }
    });
}
function placeOrder(){
    const link = document.getElementsByClassName('order_link')[0];
    let numbers = Number(link.innerHTML.replace(/\D/g, ""));
    numbers=0;
    link.innerHTML = 'Корзина ('+numbers+')';
    
    fetch("manage.php?command=placeOrder&item=products")
    .then(res => {
        return res.text();
    }).then(res => {
        if(res != ''){
            const container = document.getElementById('debug_container');
            container.innerHTML = container.innerHTML+res;
        }
    });
}
function logout(){
    fetch("manage.php?command=logout&item=users")
    .then(res => {
        return res.text();
    }).then(res => {
        if(res != ''){
            const container = document.getElementById('debug_container');
            container.innerHTML = container.innerHTML+res;
        }
        else{
            history.back();
        }
    });
}

if(document.querySelectorAll('.modal')){
    let modals = document.querySelectorAll('.modal');
    
    function hideModal(){
        modals.forEach(modal => {
            modal.classList.remove('show');
            modal.classList.add('d-none');
        });
    }
    function showModal(){
        modals.forEach(modal => {
            modal.classList.remove('show');
            modal.classList.add('d-none');
        });
    }
}