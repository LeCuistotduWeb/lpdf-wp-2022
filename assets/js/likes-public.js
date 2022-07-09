(function() {
	const likeButtons = document.querySelectorAll('.post-like__button');
	if(likeButtons){
		likeButtons.forEach(button => {
			button.addEventListener('click', (event) => {
				event.preventDefault();
				const post_id = button.dataset.postId;
				const security = button.dataset.nonce;
				const isComment = button.dataset.isComment;
				let allButtons;
				if ( isComment === '1' ) { /* Comments can have same id */
					allButtons = document.querySelectorAll('.post-like__button-'+post_id);
				} else {
					allButtons = document.querySelectorAll('.post-like__button-'+post_id);
				}
				if (post_id !== '') {
					const data = new FormData();
					data.append('action', 'process_simple_like');
					data.append('post_id', post_id);
					data.append('nonce', security);
					data.append('is_comment', isComment);
					fetch(simpleLikes.ajaxurl, {
						method: 'POST',
						body: data,
					})
						.then((response) => response.json())
						.then(function(response) {
							let icon = response.icon;
							let count = response.count;
							allButtons.forEach(b => {
								b.classList.contains('btn-rounded') ? b.innerHTML = icon : b.innerHTML = icon+count
							});
						});
				}
			});
		})
	}
})();