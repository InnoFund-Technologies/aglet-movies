import "./bootstrap";
import "./modal";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Create a global Alpine store for modal state
Alpine.store('modal', {
    movieId: null
});

window.addToFavourites = async function (id) {
    const res = await window.axios.post("/favourites", { id });

    const data = await res.data;

    if (data.status === "redirect") {
        window.location.assign(data.url);
    }
};
