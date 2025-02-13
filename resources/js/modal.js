document.addEventListener("alpine:init", () => {
    Alpine.store("modal", {
        name: null,
        movieId: id 
    });
});

window.fetchMovie = async function (id) {
    if (!id) return;

    this.isLoading = true;
    try {
        // Update URL to use the correct format for your Laravel app
        const response = await window.axios.get(`/movies/${id}`);
        return response.data;
    } catch (error) {
        console.error("Error fetching movie:", error);
        // Optionally show an error message to the user
    } finally {
        this.isLoading = false;
    }
};
