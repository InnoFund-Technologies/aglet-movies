import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

document.addEventListener("alpine:init", () => {
    Alpine.data("favorites", () => ({
        loading: false,
        isFavorited: false,

        async addToFavourites(id) {
            if (this.loading) return;

            this.loading = true;

            try {
                const res = await window.axios.post("/favourites", { id });

                const resData = await res.data;

                if (resData.status === "redirect") {
                    window.location.assign(resData.url);
                }

                if (resData.status === "success") {
                    this.isFavorited = resData.favorited;
                }
            } catch (error) {
                console.error("Error updating favorites:", error);
                this.$dispatch("notify", {
                    message: "Failed to update favorites",
                    type: "error",
                });
            } finally {
                this.loading = false;
            }
        },
    }));
    
    Alpine.data("searchMovies", () => ({
        search: "",
        searchResults: [],
        isLoading: false,

        async getSearchResults() {
            if (this.search === "") {
                this.searchResults = [];
                return;
            }

            this.isLoading = true;
  
            try {
                const response = await axios.get('/search-movies', {
                    params: {
                        query: this.search
                    }
                });
                
                // Handle the results
                if (response.data && response.data.results) {
                    this.searchResults = response.data.results.slice(0, 7); // Limit to 7 results
                } else {
                    this.searchResults = [];
                }
            } catch (error) {
                console.error('Search failed:', error);
                this.searchResults = [];
            } finally {
                this.isLoading = false;
            }
        },
    }));
});

Alpine.start();
