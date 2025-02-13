import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.addToFavourites = async function (id) {
    const res = await window.axios.post("/favourites", { id });

    const data = await res.data;

    if (data.status === "redirect") {
        window.location.assign(data.url);
    }
};
