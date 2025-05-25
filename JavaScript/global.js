document.addEventListener("DOMContentLoaded", function () {
    let formulario = document.getElementById("cadastroForm");

    if (formulario) {
        formulario.addEventListener("submit", function (event) {
            event.preventDefault(); // Impede o envio normal

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
    } else {
        console.error("Elemento #cadastroForm não encontrado!");
    }
});

$('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function (event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 800, function () {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });
