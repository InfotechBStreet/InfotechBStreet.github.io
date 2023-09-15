const sidebar = document.getElementById('sidebar');
const subscribeForm = document.getElementById('subscribe-form');

const scrollToElement = (id) => {
	const element = document.getElementById(id);
	element.scrollIntoView({behavior: 'smooth'}, true);
}

const navToggle = () => {
	sidebar.classList.toggle('sidebar_active');
}

const submitForm = (event) => {
	event.preventDefault();
	const formData = new URLSearchParams(new FormData(subscribeForm));
	fetch(`${window.location.pathname}api/subscribe.php`, {
		method: 'POST',
		body: formData
	})
	.then(response => response.json())
	.then(data => {
		alert(data.message);
	})
}

subscribeForm.addEventListener('submit', submitForm);
