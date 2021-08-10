const voteBtn = document.querySelector('.article-actions-plus');
let count = 1;


voteBtn.addEventListener('click',() => {
	if (count == 0 ) {
		voteBtn.style.backgroundColor = '#9f2f2f';
		count = 1;
	} else {
		voteBtn.style.backgroundColor = '#6B8E23';
		count = 0;
	}
});

const commentForm = document.querySelector('.comments-form');
const avatar = document.querySelector('.article-avatar');
const commentText = document.getElementsByName('comment')
const commentSubmit = document.querySelector('comments-submit');
const commentReply = document.querySelector('comment-reply');

commentReply.addEventListener('click',() => {
	
});



function showPreview(event) {
	if(event.target.files.length > 0){
		const src = URL.createObjectURL(event.target.files[0]);
		const preview = document.querySelector("#file-image-1-preview");
		preview.src = src;
		preview.style.display = "block";
	}
}