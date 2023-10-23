$(function () {

    function RequiredDisabled(form_cadastro) {
        var campos = form_cadastro.find("input,select,textarea");
        console.log(campos);
        $.each(campos, function () {
            console.log($(this));
            if ($(this).is(":visible") || $(this).attr('name') == '_token') {
                $(this).attr('required', true);
            } else {
                $(this).attr('disabled', true);
            }
        });
    }

    var form_cadastro = $("[name=formCadastro]");

    if (form_cadastro.length > 0) {
        RequiredDisabled(form_cadastro);
    }
    $('body').on('change', '[name=tipopessoa]', function () {
        $self = $(this);
        console.log($self.val());

        var templete = $('templete.campos .col-md-4').clone();
        var campos = $("div.campos");
        var contem = $("div.contem");
        campos.empty();
        if ($self.val() == 'Física') {
            templete.show();
            campos.append(templete);
            $("div.campos").find('.pessoa-juridica').remove();
            contem.show();
        } else if ($self.val() == 'Jurídica') {
            templete.find('.pessoa-fisica').remove();
            templete.show();
            campos.append(templete);
            $("div.campos").find('.pessoa-fisica').remove();
            contem.show();
        } else {
            campos.empty();
            contem.hide();
        }
    });

    $('body').on('click', '.add-telefone', function () {
        $self = $(this);
        console.log($self.val());

        var templete = $('templete.telefone div').clone();
        templete.show();
        var telefones = $("div.telefones");
        telefones.append(templete);

    });


    $('body').on('submit', '[name=formCadastro]', function () {
        var $self = $(this);
        if ($self.data('enviando')) return false;

        $self.data('enviando', true);


        var callback = function (resp) {

            alert(resp.msg);
            if (resp.success) {
                location.reload(true);
                return;
            }


            $self.data('enviando', false);
        };

        $.ajax({
            url: $self.attr('action'),
            type: 'post',
            dataType: 'json',
            data: $self.serializeArray(),
            success: callback,
            error: function () {
                callback({ success: false, msg: "Não foi possível enviar o formulário." });
            }
        });

        return false;
    });

});