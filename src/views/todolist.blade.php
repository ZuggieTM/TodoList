<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<style>
    .card {
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 80px;
    }
    .todo-header {
        padding-left: 20px;
        padding-right: 20px;
        border-radius: .25rem .25rem 0 0;
        background-color: #efefef;
        border-bottom: 1px solid #dfdfdf;
    }
    i {
        cursor: pointer;
    }
    .controls {
        float: right;
    }
    .editTodo {
        margin-right: 10px;
    }
    .deleteTodo {
        color: red;
    }
</style>
<div class="card">
    <div class="todo-header d-flex align-items-center justify-content-between">
        <h1>Todo List</h1>
        <button class="btn btn-secondary">
            <i class="fas fa-plus" id="addTodo" data-toggle="modal" data-target="#todo-modal">&nbsp;Tilføj Todo</i>
        </button>
    </div>
    <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item"><span>Køb ind til aftensmad</span><div class="controls"><i class="fas fa-edit editTodo" data-toggle="modal" data-target="#todo-modal"></i><i class="fas fa-trash deleteTodo"></i></div></li>
          <li class="list-group-item"><span>Tænd for spaen</span><div class="controls"><i class="fas fa-edit editTodo" data-toggle="modal" data-target="#todo-modal"></i><i class="fas fa-trash deleteTodo"></i></div></li>
          <li class="list-group-item"><span>Løs en rubiks terning</span><div class="controls"><i class="fas fa-edit editTodo" data-toggle="modal" data-target="#todo-modal"></i><i class="fas fa-trash deleteTodo"></i></div></li>
          <li class="list-group-item"><span>Klap din hund på hovedet</span><div class="controls"><i class="fas fa-edit editTodo" data-toggle="modal" data-target="#todo-modal"></i><i class="fas fa-trash deleteTodo"></i></div></li>
          <li class="list-group-item"><span>Hop på ét ben i 120 sekunder</span><div class="controls"><i class="fas fa-edit editTodo" data-toggle="modal" data-target="#todo-modal"></i><i class="fas fa-trash deleteTodo"></i></div></li>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.controls i', function() {
            if ($(this).hasClass('deleteTodo')) {
                $(this).parent().parent().remove();
            }
            else if ($(this).hasClass('editTodo')) {
                var text = $(this).parent().siblings('span').text();
                var index = $(this).parent().parent().index();
                console.log(index);
                $('#title').text('Rediger Todo');
                $('#todo').val(text);
                $('#addButton').hide();
                $('#saveButton').data('todo', index);
                $('#saveButton').show();
            }
        });

        $('#addTodo').on('click', function() {
            $('#title').text('Ny Todo');
            $('#todo').val('');
            $('#addButton').show();
            $('#saveButton').hide();
        });

        $('#addButton').on('click', function() {
            var text = $('#todo').val();
            var controls = '<div class="controls" style="float:right;"><i class="fas fa-edit editTodo" style="margin-right:10px" data-toggle="modal" data-target="#todo-modal"></i><i class="fas fa-trash deleteTodo" style="color:red;"></i></div>';
            $('.list-group').append('<li class="list-group-item"><span>' + text + '</span>' + controls + '</li>');
        });

        $('#saveButton').on('click', function() {
            var text = $('#todo').val();
            var index = $(this).data('todo');
            console.log($('list-group-item').eq());
            $('.list-group-item').eq(index).find('span').text(text);
        });

        $('ul').sortable();
    });
</script>
<div id="todo-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="title">Ny Todo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p><input id="todo" type="input" placeholder="Todo Beskrivelse" class="form-control"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="saveButton" data-dismiss="modal">Gem Ændring</button>
        <button type="button" class="btn btn-secondary" id="addButton" data-dismiss="modal">Tilføj Todo</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
