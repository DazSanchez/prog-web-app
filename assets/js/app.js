const opendataApi = "https://public.opendatasoft.com/api/records/1.0/search";

document.addEventListener("DOMContentLoaded", () => {
  const goBackLink = document.querySelector("#go-back-link");
  if (goBackLink) {
    goBackLink.addEventListener("click", e => {
      e.preventDefault();
      window.history.back();
    });
  }

  const saveBtn = document.querySelector(".js-save-btn");
  const form = document.querySelector(".js-form");

  if (saveBtn && form) {
    saveBtn.addEventListener("click", () => {
      saveBtn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i>';
      saveBtn.setAttribute("disabled", "disabled");
      form.submit();
    });
  }

  const state = document.querySelector("#state");
  const city = document.querySelector("#city");

  if (state && city) {
    const stateLoader = document.querySelector("#state-loader");
    const cityLoader = document.querySelector("#city-loader");
    const defaultOption = document.createElement("option");

    defaultOption.innerText = "";
    state.setAttribute("disabled", "disabled");
    city.setAttribute("disabled", "disabled");
    cityLoader.classList.toggle("invisible");

    fetch(
      `${opendataApi}/?dataset=estados-de-mexico&rows=32&facet=codigo&facet=estado`
    )
      .then(response => response.json())
      .then(results => results.records.sort())
      .then(records =>
        records.map(record => {
          const option = document.createElement("option");
          option.value = record.fields.estado;
          option.innerText = record.fields.estado;
          return option;
        })
      )
      .then(options => {
        state.innerHTML = "";
        state.appendChild(defaultOption);
        options.forEach(option => state.appendChild(option));
        stateLoader.classList.toggle("invisible");
        state.removeAttribute("disabled");
      });

    state.addEventListener("change", e => {
      const stateName = e.target.value;
      city.setAttribute("disabled", "disabled");
      cityLoader.classList.toggle("invisible");

      fetch(
        `${opendataApi}/?dataset=ciudades-de-mexico&rows=213&facet=name_1&facet=name_2&refine.name_1=${stateName}`
      )
        .then(response => response.json())
        .then(results => results.records.sort())
        .then(records =>
          records.map(record => {
            const option = document.createElement("option");
            option.value = record.fields["name_2"];
            option.innerText = record.fields["name_2"];
            return option;
          })
        )
        .then(options => {
          city.innerHTML = "";
          city.appendChild(defaultOption);
          options.forEach(option => city.appendChild(option));
          cityLoader.classList.toggle("invisible");
          city.removeAttribute("disabled");
        });
    });
  }
});
