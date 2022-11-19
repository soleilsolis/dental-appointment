import "./bootstrap";

import.meta.glob(["../image/**", "../fonts/**"]);

document.querySelectorAll(".submit-form").forEach(
    (form) =>
        (form.onsubmit = async (e) => {
            e.preventDefault();

            let url = "api";
            //let url = "http://localhost:8080/api";

            if(form.dataset.api === 'no') {
                url = "";
                 //url = "http://localhost:8080";
            }
            
            let method = form.dataset.method;
            let action = form.dataset.action;
            let callback = form.dataset.callback;
            
            let body = new FormData(form);
            let headers = {};

            let submitButton = form.querySelector('[type="submit"]');

            submitButton.classList.add("loading", "disabled");

            if (typeof bearer_token !== "undefined") {
                headers["Authorization"] = `Bearer ${bearer_token}`;
            }
            headers["Accept"] = "application/json";

            let response = await fetch(url + action, {
                method: method,
                body: body,
                headers: headers,
            })
                .then(function (response) {
                    if (!response.ok) {

                        if (response.status === 422) {
                            response.json().then((result) => {
              
                                if (typeof result.errors !== "undefined") {
                                    for (const [key, value] of Object.entries(result.errors)) {
                                        document.querySelector(`[id=${key}]`).closest(".field").classList.add("error");
                                        document.querySelector(`[id=${key}]`).classList.add("error");
                                        document.querySelector(`[id=error_${key}]`).innerHTML = value;
                                    }

                                    submitButton.classList.remove(
                                        "loading",
                                        "disabled"
                                    );
                                }
                            });
                        }

                        if (response.status === 404) {
                            const notFound = document.createElement('div');
                            notFound.classList.add('ui', 'container', 'text-4xl', 'font-bold', 'mt-10');
                            notFound.innerHTML = "Page Not Found";
                            document.querySelector('#everything').innerHTML = '';
                            document.querySelector('#everything').append(notFound);

                        }
                    }
                    return response;
                })
                .then(async (response) => response.json())

                .then(async (result) => {
                    window[callback](result);
                })
                
                .catch((error) => {
                    //console.log(error)
                });
        })
);

document.querySelectorAll(".field").forEach((element) => {
    element.addEventListener("input", async function () {
        this.classList.remove("error");
        this.lastElementChild.innerHTML = "";
    });
});