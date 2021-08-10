function showPreview(event) {
	if(event.target.files.length > 0){
		const src = URL.createObjectURL(event.target.files[0]);
		const preview = document.querySelector("#file-image-1-preview");
		preview.src = src;
		preview.style.display = "block";
	}
}


function deleteAlert() {
	swal({
		title: "Jesteś pewien?",
		text: "Na pewno chcesz usunąć swoje konto? Ta operacja jest nieodwracalna.",
		buttons: true,
		dangerMode: true,
		buttons: ["Nie", "Tak"],
	})
	.then((willDelete) => {
		if (willDelete) {
			swal("Twoje konto zostało usunięte!", {
			});
		}
	});
}

