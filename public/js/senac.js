$(document).ready(function(){
    $('#form-publicacoes').validate({
        rules: {
            aluno: 'required',
            curso: 'required',
            data: 'required',
            conteudo: 'required'
        },
        messages: {
            aluno: 'Insira o nome do aluno',
            curso: 'Insira o nome do curso',
            data: 'Insira a data da publicação',
            conteudo: 'Insira o conteúdo da publicação'
        },        
        errorPlacement: function(error, element) {            
            error.insertAfter(element).addClass('text-danger');
        },
        errorClass: "is-invalid"
    });

    $('#btn-enviar').click(function(event){
        event.preventDefault();
        var form = $(this).parents('form');
        var formAction = form.attr('action') + '&jsonrequest=1';
        if(form.valid()) {
            $.ajax({
                method: 'POST',
                data: form.serialize(),
                timeout: 15000,
                dataType: 'json',
                url: formAction,
                success: function(retorno) {             
                    if (retorno['result'] == true) {                    
                        $('#toast-cadastro .toast-header i').attr('class', 'fa fa-check text-success mr-1');
                    } else {
                        $('#toast-cadastro .toast-header i').attr('class', 'fas fa-times-circle text-danger mr-1');
                    }
                    //pegando a mensagem de retorno da requisição, pra colocar no toast
                    $('#toast-cadastro .toast-body').html(retorno['mensagem']);
                    $('#toast-cadastro').toast({
                        autohide: true,
                        delay: 10000
                    }).toast('show');

                    if(retorno['url'] != '' && retorno['url'].length > 6) {
                        setTimeout(() => {
                            window.location.href = retorno['url'];
                        }, 2000);
                    }
                }
            });
        }
    });

    $('.btn-apagar').click(function(event){
        event.preventDefault();
        let urlAction = $(this).attr('href') + '&jsonrequest=1';  
        let btnApagar = $(this);

        swal({
            title: "Você tem certeza que deseja apagar?",
            text: "Não é possível reverter esta operação!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: 'GET',
                    timeout: 15000,
                    dataType: 'json',
                    url: urlAction,
                    success: function(retorno) { 
                        if (retorno['result'] == true) {
                            btnApagar.parents('tr').remove();
                            swal(retorno['mensagem'], "", "success");
                        } else {
                            swal(retorno['mensagem'], "", "error");
                        }
                    }
                });
            }
          });
    });

    $('table[data-toggle="data-tables"]').DataTable({
        paging: true,
        ordering: true,
        order: [
            [0, 'desc']
        ],
        columnDefs: [
            { "orderable": false, "targets": 4 }
        ],
        lengthChange: true,
        lengthMenu: [12, 24, 48, 96, 192],
        pageLength: 12,
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros",
            "zeroRecords": "Desculpe, nenhum registro encontrado",
            "info": "Exibindo _PAGE_ª de _PAGES_ páginas",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros totais)",
            "search": "Buscar:",
            "paginate": {
                "next":       "Próximo",
                "previous":   "Anterior"
            }
        }
        //dom: '<"row"<"col-sm-12 col-md-6"f><"col-sm-12 col-md-6"l>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>'
    });

    $('#summernote').summernote({
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    $("select").chosen(
        {
            disable_search_threshold: 2,
            no_results_text: "Nada encontrado:"
        }
    );
    $("input[type=file]").fileinput(
        {
            language:'pt-BR',
            allowedFileExtensions: ['jpg', 'gif', 'png']
        }
    );
});