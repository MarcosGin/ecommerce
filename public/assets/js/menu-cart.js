 var changeCart = (function () {

     return{
         init: function () {
             var cart = (function () {
                 var cart = JSON.parse(localStorage.getItem("cart"));
                 if (cart === null) {
                     cart = {};
                 }
                 return {
                     value: function () {
                         return cart;
                     }
                 }
             })();
             Number.prototype.formatMoney = function(c, d, t){
                 var n = this,
                     c = isNaN(c = Math.abs(c)) ? 2 : c,
                     d = d == undefined ? "." : d,
                     t = t == undefined ? "," : t,
                     s = n < 0 ? "-" : "",
                     i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
                     j = (j = i.length) > 3 ? j % 3 : 0;
                 return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
             };
             var price = 0,
                 items = 0;
                 productPrice= 0;
                 getHTML = "";
             for (var obj in cart.value()){
                 productPrice = parseInt(cart.value()[obj].price) * parseInt(cart.value()[obj].quantity);
                 price += productPrice;
                 items++;

                 getHTML += '<div class="item">' +
                     '<div class="item-img"> <img src="http://localhost/ecommerce/public/assets/img/products/' + cart.value()[obj].img + '" /></div>'+
                     '<div class="item-info">'+
                            '<div class="name">'+ cart.value()[obj].name + '</div>'+
                            '<div class="info category"><span>Category:</span> '+ cart.value()[obj].category +'</div>'+
                            '<div class="info quantity"><span>Quantity:</span> '+ cart.value()[obj].quantity +'</div>'+
                            '<div class="info price"><span>Price:</span> $ ' + parseInt(cart.value()[obj].price).formatMoney(0,',', '.') + '</div>' +
                     '</div></div>';

             }

                    var element = $('#Cart');
                    var info = element.children('div.cart');
                    info.children('span').empty();
                    info.children('span').append('$ ' + price.formatMoney(0, ',', '.') + ' (' + items +') ');

                    var data = element.children('div.data');
                    data.empty();
                    data.append(getHTML);
                }
            }
    })();
    changeCart.init();


 $('#Cart').on('click', function () {
    $(this).toggleClass('active');
 });