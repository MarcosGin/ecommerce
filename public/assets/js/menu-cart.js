 var changeCart = (function () {
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
        for (var obj in cart.value()){
            productPrice = parseInt(cart.value()[obj].price) * parseInt(cart.value()[obj].quantity);
            price += productPrice;
            items++;
        }
        console.log(price + ' ' +items);
        
        return{
            init: function () {
                var element = $('#Cart').children('span');
                element.empty();
                element.append('$ ' + price.formatMoney(0, ',', '.') + ' ');
                console.log(element);
            }
        }
        

    })();

    changeCart.init();


