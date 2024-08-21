$(function(){

    load_tasks();
    let edit = false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  


    $('#search').keyup(function() {
        load_tasks();
    });
    
    $('#task-form').submit(function (e) {
        const postData = {
            name : $('#name').val(),
            description: $('#description').val(),
            id : $('#taskId').val(),
            gender : $('#selector').val()
        };
        let url = edit === false ? APP_URL + '/task/store' : APP_URL + '/task/edit';
        
        $.post(url, postData, function(response){
           
            
            if (response){
                load_tasks();
                $('#task-form').trigger('reset');
                $('#taskId').val("");
                edit = false;
            }
            else{
                alert('Task was already created')
            }
        });

        e.preventDefault();
    });


    

    function load_tasks(){
        let search_task = $('#search').val();
        $.ajax({
            url : APP_URL + '/tasks/update',
            type: 'GET',
            data: {gender:$('#selector').val(), search:search_task},
            success: function(response) {
               
                let tasks = response;
                let $template = $('#task-template'); // 
                let $tasksContainer = $('#tasks'); // 
                $tasksContainer.empty();

                tasks.forEach(task => {
                    let $clone = $($template.html()); 
                    $clone.attr('taskId', task.id); 
                    $clone.find('.task-id').text(task.id); 
                    $clone.find('.task-name').text(task.name); 
                    $clone.find('.task-description').text(task.description); 
                    $tasksContainer.append($clone); 
                });
            },
            error: function(error) {
                console.error('Error loading tasks:', error);
            }
        }
        );
    }

    SelectorValues();

    function SelectorValues(){


        $.get(APP_URL + '/selector/gender', function(response){
            
            let genders = response;
            let $genderSelector = $('#selector');
            $genderSelector.empty();
            $genderSelector.append('<option value="None">None</option>');
            genders.forEach(gender => {
                $genderSelector.append(`<option value="${gender.name}">${gender.name}</option>`);
            })
        })
    

    }

    $(document).on('change','#selector', function(){
        load_tasks();
    });


    $(document).on('click','.task-item', function(){
        let element = $(this)['0'].parentElement.parentElement;
        let id = $(element).attr('taskId');
        edit = true;
        $.post(APP_URL + '/task/get', {id}, function(response){
            $('#name').val(response.name);
            $('#description').val(response.description);
            $('#taskId').val(response.id);
        })
    });

   
   
    $(document).on('click','.task-delete', function(){
        let element = $(this)['0'].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post(APP_URL + '/task/delete',{id}, function(response){
            load_tasks();
        });
    });
    
});