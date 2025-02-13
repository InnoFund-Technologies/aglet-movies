function openModal(id) {
    console.log("openning modal :", id)

    Livewire.emit('openMovieModal', id);
}