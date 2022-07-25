	
window.addEventListener('DOMContentLoaded', DOMIsLoaded);

function DOMIsLoaded() {

	window.onscroll = function() {

		let windowScroll = window.pageYOffset;

		let backTop = document.getElementById('backTop');

		if(windowScroll > 1000) {

			backTop.style.display = 'block';

			backTop.onclick = function() {

				window.scrollTo({
					top: 0,
					behavior: "smooth"
				});

			}

		}else{

			backTop.style.display = 'none';

		}

	}

}

