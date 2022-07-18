var modal = document.querySelector('.modal');

var form_add_product = document.querySelector('#form-add-product');

var series_select = form_add_product.querySelector('#product-series');
var categody_select = form_add_product.querySelector('#product-category');
var color_select = form_add_product.querySelector('#product-color');

var upload_input = form_add_product.querySelector('#product-upload');
var list_uploaded = form_add_product.querySelector('.uploads__list-uploaded ul');

var uploaded = new Object;

const INPUTS = form_add_product.querySelectorAll('input:not([type=file]), select');

if(categody_select.value == 0){
    series_select.disabled = true;
}
const category_change = (element) =>{
    let xhr = new XMLHttpRequest();
    let url = window.location.pathname + `?category_id=${element.value}`;
    
    xhr.open('GET', url);
    xhr.onload = e =>{
        
        let resp = JSON.parse(xhr.response);
        series_select.disabled = (element.value > 0) ? false: true;
        
        removeAllChild(series_select);
        makeOptions(resp, series_select);
    }
    xhr.send();
    
}




const view_modal = () =>{
    modal.classList.remove('hide');
};

const modal_cancel = () =>{
    
    modal.classList.add('hide');
    clearInputs();
}



function removeAllChild(parent){
    
    while(parent.firstChild){
        parent.removeChild(parent.firstChild);
    }
}

function makeOptions(datas, select){
    if(datas.length == 0){
        let opt = document.createElement('option');
        opt.setAttribute('value', 0);
        opt.innerHTML = 'No series available';
        opt.selected = true;
        select.appendChild(opt);
        return;
    }

    for(let data of datas){
        let opt = document.createElement('option');
        opt.setAttribute('value', data.series_id);
        opt.innerHTML = data.series_name;
        select.appendChild(opt);
    }

}


upload_input.onchange = ({target}) =>{
    let allowed_mime_types = [];
    let allowed_size_mb = 100 * 1024 * 1024;

    let files = target.files;
    
    
    for(let file of files){
        if(file.size > allowed_size_mb){
            alert('Exceed size' + file.name);
            return;
        }
        let li_code = `
            <div class="ul-li__thumbnail">
                <i class="fa-solid fa-file-image"></i>
                <span class="completed">
                    <i class="fa-solid fa-circle-check">
                </i></span>
            </div>
            <div class="ul-li__properties">
                <span class=""properties__name">
                    ${file.name}
                </span>
                <span class="properties__size">
                    ${bytesToSize(file.size)}
                </span>
                <span class="progress">
                    <span class="progress__buffer">
                        <div class="buffer__color"></div>
                    </span>
                    <span class="progress__percentage"></span>
                </span>
            </div>
            
            <button type="button" class="ul-li__remove-btn" uploaded>
                <i class="fa-solid fa-xmark"></i>
            </button>
        `;
        let li = document.createElement('li');
        li.classList.add('uploaded__ul-li');
        li.classList.add('image');
        li.innerHTML = li_code
        list_uploaded.appendChild(li);
        upload_file(file, li);
    }
}

var index = 0;

function upload_file(file, li_element){
    uploaded[index] = file;
    
    li_element.index = index++;
    console.log(uploaded);
    let filename = file.lastModified +file.name;
    let xhr = new XMLHttpRequest();
    let data = new FormData();
    data.append('filename',filename );
    data.append('file', file);

    xhr.open('POST', '/php-ecommerce/admin/upload.php');

    xhr.upload.onprogress = e => {
        let percent = Math.ceil((e.loaded / e.total) * 100);
        console.log(percent);
        li_element.querySelector('.progress__percentage').innerHTML = percent + '%';
        li_element.querySelector('.buffer__color').style.setProperty('width', percent + '%');

        if(e.loaded == e.total){
            let remove_btn = li_element.querySelector('.ul-li__remove-btn');

            remove_btn.style.setProperty('display', 'flex');
            li_element.querySelector('.completed').style.setProperty('display', 'flex');
            remove_btn.onclick = e =>{
                delete uploaded[li_element.index];
                li_element.remove();
                console.log(uploaded);
            }

        }

    }
    xhr.onload = e =>{
        console.log(xhr.responseText);
        
    }
    xhr.send(data);
    
}


const bytesToSize = (bytes) =>{
    let sizes = ['Bytes', 'KB', 'MB', 'GB'];
    if(bytes == 0) return '0 Byte';
    let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes/ Math.pow(1024, i), 2) + ' ' + sizes[i];
}

function modal_done(type){
    let xhr = new XMLHttpRequest();
    xhr.open('POST','/php-ecommerce/admin/add-product.php');
    let data = new FormData();
    data.append('add_product_submit', 1);
    for(let upload of Object.values(uploaded)){
        data.append('files[]', upload);
    }
    for(let input of INPUTS){
        data.append(input.name, input.value);
    }
    xhr.onload = e => {
        console.log(xhr.responseText);
    }

    xhr.send(data);
    clearInputs();
    modal.classList.add('hide');

}

function clearInputs(){
    for(let input of INPUTS){
        input.value='';
    }
    series_select.disabled = true;
    series_select.firstChild.selected=true;
    color_select.firstChild.selected = true;
    for(let li of list_uploaded.querySelectorAll('li')){
        li.remove();
    };
    uploaded = new Object();
}