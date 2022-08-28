let $ = (g) => document.querySelector(g);
        
setInterval(()=>{
    $('#svg1').onclick = function(){
        if($('#pass').type == 'password'){
            $('#pass').type = 'text';
            $('.svg2').style.cssText = 'display: block';
            $('.svg').style.cssText = 'display: none';
        }
        $('.svg2').onclick = function(){
            if($('#pass').type == 'text'){
                $('#pass').type = 'password';  
                $('.svg2').style.cssText = 'display: none';                                              
                $('.svg').style.cssText = 'display: block';                        
            }
        }
    }        
}, 500);