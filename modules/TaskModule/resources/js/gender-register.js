$(function(){

    let edit = false;
    load_genders();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    


    $('#search').keyup(function() {
        load_genders();
    });
    
    $('#gender-form').submit(function (e) {
       
        const postData = {
            name : $('#name').val(),
            id : $('#genderId').val()
        };
       
        let url = edit === false ? APP_URL + '/gender/store' : APP_URL + '/gender/edit';
        $.post(url, postData, function(response){
           
            if (response){
                load_genders();
                $('#gender-form').trigger('reset');
                $('#genderId').val("");
                edit = false;
            }
            else{
                console.log('Gender was already created')
                alert('Gender was already created')
            }
        });

        e.preventDefault();
    });


    function load_genders(){
        let search_gender = $('#search').val();
        $.ajax({
            url : APP_URL + '/genders/update',
            type: 'GET',
            data: {search:search_gender},
            success: function(response) {
                
                let genders = response;
                let $template = $('#Gender-template'); // 
                let $gendersContainer = $('#genders'); // 
                $gendersContainer.empty();

                genders.forEach(gender => {
                    let $clone = $($template.html()); 
                    $clone.attr('genderId', gender.id); 
                    $clone.find('.gender-id').text(gender.id); 
                    $clone.find('.gender-name').text(gender.name);  
                    $gendersContainer.append($clone); 
                });
            },
            error: function(error) {
                console.error('Error loading gender:', error);
            }
        }
        );
    }

 

   

    $(document).on('click','.gender-item', function(){
        let element = $(this)['0'].parentElement.parentElement;
        let  id = $(element).attr('genderId');
        let name= $(element).find('.gender-name').text();
        edit = true;
        $.post(APP_URL + '/gender/get', {name}, function(response){
            $('#name').val(response.name);
            $('#genderId').val(response.id);
           
        })
    });

   
   
    $(document).on('click','.gender-delete', function(){
        let element = $(this)['0'].parentElement.parentElement;
        let id = $(element).attr('genderId');
        $.post(APP_URL + '/gender/delete',{id}, function(response){
            
            load_genders();
        });
    });
    
});