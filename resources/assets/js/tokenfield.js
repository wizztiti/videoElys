$('#tokenfield').tokenfield({
    autocomplete: {
        source: "/api/tags",
        minLength: 2
    },
    showAutocompleteOnFocus: true
})