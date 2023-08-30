var productsPrice = document.getElementsByClassName('price');
for(var i = 0; i < productsPrice.length; i++) {
    var formatPrice = parseInt(productsPrice[i].innerText);
    productsPrice[i].innerText = formatPrice.toLocaleString('vi-VN');  
}

function priceLevel() {
    var priceChoose = document.getElementById('price-level');

    // kiểm tra mức giá dưới 5 triệu
    if(priceChoose.value == 1) {
        for(var i = 0; i < productsPrice.length; i++) {
            var unFormatPrice = productsPrice[i].innerText.replace(/[.,]/g, "");
            var price = parseInt(unFormatPrice);
            if(price > 5000000) {
                productsPrice[i].parentElement.style.display = 'none';
            } else {
                productsPrice[i].parentElement.style.display = '';
            }
        }
    }

    //kiểm tra mức giá từ 5 đến 12 triệu
    if(priceChoose.value == 2) {
        for(var i = 0; i < productsPrice.length; i++) {
            var unFormatPrice = productsPrice[i].innerText.replace(/[.,]/g, "");
            var price = parseInt(unFormatPrice);
            if(price <= 5000000 || price > 12000000) {
                productsPrice[i].parentElement.style.display = 'none';
            } else {
                productsPrice[i].parentElement.style.display = '';
            }
        }
    }

    //kiểm tra mức giá từ 12 đến 20 triệu
    if(priceChoose.value == 3) {
        for(var i = 0; i < productsPrice.length; i++) {
            var unFormatPrice = productsPrice[i].innerText.replace(/[.,]/g, "");
            var price = parseInt(unFormatPrice);
            if(price <= 12000000 || price > 20000000) {
                productsPrice[i].parentElement.style.display = 'none';
            } else {
                productsPrice[i].parentElement.style.display = '';
            }
        }
    }

    //kiểm tra mức giá từ 12 đến 20 triệu
    if(priceChoose.value == 4) {
        for(var i = 0; i < productsPrice.length; i++) {
            var unFormatPrice = productsPrice[i].innerText.replace(/[.,]/g, "");
            var price = parseInt(unFormatPrice);
            if(price <= 20000000 || price > 30000000) {
                productsPrice[i].parentElement.style.display = 'none';
            } else {
                productsPrice[i].parentElement.style.display = '';
            }
        }
    }

    //mặc định khi người dùng chọn option đầu tiên
    if(priceChoose.value == '') {
        for(var i = 0; i < productsPrice.length; i++) {
            productsPrice[i].parentElement.style.display = '';
        }
    }
}

//Hàm xử lý khi tick vào checkbox chọn sản phẩm
function productsUnable(obj) {
    var row = obj.parentElement.parentElement;
    row.querySelector('.qty').disabled = !obj.checked;
    row.querySelector('.qty').value = '';
    row.querySelector('.sum-price').innerText = ''

    //cập nhật tổng tiền của toàn bộ sản phẩm đã chọn
    total()
}

//hàm tính tổng tiền của từng sản phẩm khi chọn số lượng
function quantityChange(obj) {
    var quantity = parseInt(obj.value); //lấy ra giá trị của ô nhập vào
    if(isNaN(quantity)) {
        //Nếu số lượng nhập vào không phải là số thì sẽ chuyển thành 0
        quantity = 0;
    }
    var price = obj.parentElement.parentElement.querySelector('.price').innerText;
    var sumPrice = obj.parentElement.parentElement.querySelector('.sum-price');
    price = price.replace(/[.,]/g, "");
    price = parseFloat(price);
    var sum = quantity*price;

    //gán tổng tiền và chuyển số thành giá tiền cho dễ đọc
    sumPrice.innerText = sum.toLocaleString('vi-VN');  
    if (quantity == 0) {
        sumPrice.innerText = ''; // Xóa kết quả tính toán nếu quantity là 0
    }

    //cập nhật tổng tiền của toàn bộ sản phẩm đã chọn
    total()
}

//hàm tính tổng toàn bộ sản phẩm đã chọn
function total() {
    var sum = 0;
    var sumPrices = document.getElementsByClassName('sum-price');
    for(var i = 0; i < sumPrices.length; i++) {
        var price = sumPrices[i].innerText;

        // loại bỏ các dấu chấm trong mệnh giá tổng tiền của các sản phẩm để tính toán
        price = price.replace(/[.,]/g, "");
        price = parseFloat(price);
        if (!isNaN(price)) {
            sum += price;
        }
    }
    
    if(sum == 0) {
        //nếu tổng tiền bằng 0 thì nội dung của ô tổng tiền sẽ bằng rỗng
        document.querySelector('.total').innerText = ''
    } else {
        //gán tổng tiền đã tính cho thẻ td.total và chuyển sang giá tiền cho dễ đọc
        document.querySelector('.total').innerText = sum.toLocaleString('vi-VN');
    }
}

