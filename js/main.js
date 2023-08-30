var images = [];
var index = 1; //vị trí ảnh đang hiển thị
var soHinh = 15; //số lượng hình của slideshow

for(var i = 1; i <= soHinh; i++) {
    images[i] = new Image();
    images[i].src = 'images/slider' + i + '.png';
}

function prev() {
    index--;
    if(index < 1) index = images.length - 1;
    var anh = document.querySelector('#home img');
    anh.src = images[index].src;

    //cập nhập vị trí ảnh
    document.querySelector('.img-position').innerText = index;
}

function next() {
    index++;
    if(index >= images.length) index =  1;
    var anh = document.querySelector('#home img');
    anh.src = images[index].src;

    //cập nhập vị trí ảnh
    document.querySelector('.img-position').innerText = index;
}

