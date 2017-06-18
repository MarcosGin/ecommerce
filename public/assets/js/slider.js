$(function(){
        var SliderModule = (function(){
          var pb = {};
            pb.el =$('#slider');
            pb.items ={
                panel: pb.el.find('li')
            }
            var SliderInterval,
                currentSlider=0,
                nextSlider=1,
                legthSlider = pb.items.panel.length;
            pb.init = function(settings){
                this.settings = settings || {duration:8000};
               SliderInit();
                var output = '';
                for(var i=0;i<legthSlider;i++){
                    if(i==0){
                        output += '<li class="active"></li>';
                    }else{
                        output += '<li></li>'
                    }
                }
                $('#slider-controls').html(output).on('click','li',function(e){
                   var $this = $(this);
                   if(currentSlider!== $this.index()){
                       changePanel($this.index());
                   }
                });
            }
            var SliderInit = function(){
                SliderInterval = setInterval(pb.startSlider,pb.settings.duration);
            }
            pb.startSlider = function(){
                var panels = pb.items.panel,
                    controls= $('#slider-controls li');
                if(nextSlider >= legthSlider){
                    nextSlider=0;
                    currentSlider = legthSlider-1;
                }
                controls.removeClass('active').eq(nextSlider).addClass('active');
                panels.eq(currentSlider).fadeOut('slow');
                panels.eq(nextSlider).fadeIn('slow');
              
                currentSlider= nextSlider;
                nextSlider +=1;
            }
            var changePanel = function(id){
                clearInterval(SliderInterval);
               var panels = pb.items.panel,
                    controls= $('#slider-controls li');
                if(id >= legthSlider){
                    id=0;
                }else if(id < 0){
                    id=legthSlider-1; 
                }
                 controls.removeClass('active').eq(id).addClass('active');
                panels.eq(currentSlider).fadeOut('slow');
                panels.eq(id).fadeIn('slow');
              
                
                currentSlider =id;
                nextSlider=id+1;
                SliderInit();
            }
            return pb;
        }());
    SliderModule.init();
});