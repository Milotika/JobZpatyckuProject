const form = document.querySelector('#create-post-picture-form');
const title = document.querySelector('#title');
const category = document.querySelector('#category');

// form.addEventListener('submit',(e) => {
// 	e.preventDefault();

// 	checkInputs();
// });

// function checkInputs() {
// 	const titleValue = title.value.trim();
// 	const categoryValue = category.value;
// 	var i = 0;
// 	if(titleValue === ''){
// 		setError(title,'Tytuł jest wymagany');
// 	} else {
// 		setSuccess(title);
// 		i++;
// 	}

// 	if(categoryValue === ''){
// 		setError(category,'Kategoria jest wymagana');
// 	} else {
// 		setSuccess(category);
// 		i++;
// 	}
// }

// function setError(input,message) {
// 	const createForm = input.parentElement;
// 	const small = createForm.querySelector('small');
// 	small.textContent = message;  
// 	createForm.className = 'create-post-control error';
// }

// function setSuccess(input){
// 	const createForm = input.parentElement;
// 	createForm.className = 'create-post-control success';
// }


function showPreview(event) {
	if(event.target.files.length > 0){
		const src = URL.createObjectURL(event.target.files[0]);
		const preview = document.querySelector("#file-image-1-preview");
		preview.src = src;
		preview.style.display = "block";
	}
}