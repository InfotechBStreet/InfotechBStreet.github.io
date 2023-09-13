const sidebar = document.getElementById('sidebar');

const scrollToElement = (id) => {
	const element = document.getElementById(id);
	element.scrollIntoView({behavior: 'smooth'}, true);
}

const navToggle = () => {
	sidebar.classList.toggle('sidebar_active');
}
