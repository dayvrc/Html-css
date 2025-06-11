document.addEventListener("DOMContentLoaded", function () {
    if (window.location.pathname.includes("cadastro.php")) {
        let formulario = document.getElementById("cadastroForm");

        if (formulario) {
            formulario.addEventListener("submit", function (event) {
                event.preventDefault();

                let formData = new FormData(formulario);

                fetch("PHP/cadastro.php", {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        let popup = document.getElementById("popupMensagem");
                        let mensagem = document.getElementById("mensagemPopup");

                        if (data.erro) {
                            mensagem.innerText = data.erro;
                            popup.classList.add("erro");
                            popup.classList.remove("sucesso");
                        } else {
                            mensagem.innerText = data.sucesso;
                            popup.classList.add("sucesso");
                            popup.classList.remove("erro");

                            setTimeout(() => {
                                window.location.href = data.redirect;
                            }, 3000);
                        }

                        popup.style.display = "block";
                    })
                    .catch(error => console.error("Erro ao processar:", error));
            });
        }
    }
});


$('a[href*="#"]')

    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function (event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

            if (target.length) {

                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 800, function () {

                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) {
                        return false;
                    } else {
                        $target.attr('tabindex', '-1');
                        $target.focus();
                    };
                });
            }
        }
    });

$(document).ready(function () {
    let currentIndex = 0;
    const $wrapper = $('.passagens-wrapper');
    const $blocos = $('.bloco_passagem');
    const total = $blocos.length;

    function itemsPorPagina() {
        return window.innerWidth >= 768 ? 4 : 1;
    }

    function updateCarousel() {
        const itensVisiveis = itemsPorPagina();
        const larguraBloco = $blocos.outerWidth(true); // inclui margin/padding

        // Limita o índice máximo para não deixar espaço vazio
        const maxIndex = total - itensVisiveis;
        if (currentIndex > maxIndex) currentIndex = maxIndex < 0 ? 0 : maxIndex;
        if (currentIndex < 0) currentIndex = 0;

        const deslocamento = -currentIndex * larguraBloco;
        $wrapper.css('transform', 'translateX(' + deslocamento + 'px)');
    }

    $('#btn-prev').click(function () {
        currentIndex--;
        updateCarousel();
    });

    $('#btn-next').click(function () {
        currentIndex++;
        updateCarousel();
    });

    $(window).resize(function () {
        updateCarousel();
    });

    updateCarousel(); // inicializa
});

$(document).ready(function () {
    $('#formCompra').on('submit', function (e) {
        e.preventDefault();
        const quantidade = $('#quantidade').val();
        const pagamento = $('input[name=pagamento]:checked').val();

        $.ajax({
            url: 'PHP/processar_compra.php',
            method: 'POST',
            dataType: 'json',
            data: {
                destino: 'Salvador',
                quantidade: quantidade,
                pagamento: pagamento
            },
            success: function (resposta) {
                $('#mensagemPopup').text(resposta.sucesso || resposta.erro);
                $('#popupMensagem').fadeIn();
            }
        });
    });

    window.fecharPopup = function () {
        $('#popupMensagem').fadeOut();
    };
});

