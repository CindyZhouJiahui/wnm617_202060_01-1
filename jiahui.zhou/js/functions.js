
const query =(options)=>{
	// Fetch is a Promise
	return fetch('data/api.php',{
		method:'POST',
		body:JSON.stringify(options),
		headers:{'Content-Type':'application/json'}
	.then()
}