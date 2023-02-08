(function($){
    $(document).ready(function(){
        $('.delete-form').submit(function(e){
            
            let confir = confirm('Caution! It will be deleted permanently. Are you sure?');
            if(confir){
                return true;
            }else{
                e.preventDefault();
            }
        });


    });
})(jQuery)