tinymce.init({ selector: 'textarea' });



$(document).ready(function(){
    
    
    
$('#selectAllBoxes').click(function(event){
    
    
    if(this.checked){
        
        
        $('.checkBoxes').each(function(){
            
            
            this.checked = true;
            
            
        });
        
        
        
    }else{
        
        
       
        $('.checkBoxes').each(function(){
            
            
            this.checked = false;
            
            
        });
        
        
        
    }
    
    
    
    
    
});    
   
var div_Box =   "<div id='load-screen'><div id='loading'></div></div>";

$("body").prepend(div_Box);

$('#load-screen').delay(700).fadeOut(600,function(){
        
       $(this).remove(); 
        
});
        
});
    
    