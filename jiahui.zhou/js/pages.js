
const ListPage = async(d=0) => {
	// 这里不做登录判断
	// if(!d) d = await query({type:"market_by_user_id",params:[sessionStorage.userId]})

	d = await market();
	// $("body").html($("body").html()+makemarketItem(d.production));
	$("#list-page .marketlist").html(
			makemarketList(d.production)
	);
}






const RecentPage = async(d=0) => {
	if(!d) d = await query({type:"recent_locations",params:[sessionStorage.userId]});

	let map_el = await makeMap("#recent-page .map");

	let valid_market = d.result.reduce((r,o)=>{
		o.icon = o.img;
		if(o.lat && o.lng) r.push(o);
		return r;
	},[]);

	makeMarkers(map_el,valid_animals);

	map_el.data("markers").forEach((o,i)=>{
		o.addListener("click",function(){
			// INFOWINDOW EXAMPLE
			map_el.data("infoWindow").open(map_el.data("map"),o);
			map_el.data("infoWindow").setContent(makeRecentProfile(valid_animals[i]))

			// SIMPLE NAVIGATION
			// sessionStorage.animalId = valid_animals[i].animal_id;
			// $.mobile.navigate("#animal-profile-page");

			// DRAWER EXAMPLE
			// $("#recent-profile-drawer")
			// 	.toggleClass("active")
			// 	.find(".modal-body").html(makeRecentProfile(valid_animals[i]))
		})
	});
}






const ProfilePage = async() => {
	let user = await query({type:"user_by_id",params:[sessionStorage.userId]});
	let animals = await query({type:"animals_by_user_id",params:[sessionStorage.userId]});
	let locations = await query({type:"locations_by_user_id",params:[sessionStorage.userId]});

	$("#profile-page .profile")
		.html(makeUserProfile(user.result[0],animals.result,locations.result));
}

const marketProfilePage = async() => {
	if(sessionStorage.animalId===undefined) throw("No market ID in Storage");

	let market = await query({type:"market_by_id",params:[sessionStorage.animalId]})
	let locations = await query({type:"locations_by_market_id",params:[sessionStorage.animalId]})

	$("#market-profile-page h1").html(animal.result[0].name)

	$("#market-profile-page .profile-head").removeClass("active")
		.html(makemarketProfile(market.result[0],locations.result));

	let map_el = await makeMap("#market-profile-page .map");

	makeMarkers(map_el,locations.result);
}




const SettingsProfilePage = async() => {
	let d = await query({type:"user_by_id",params:[sessionStorage.userId]});

	$("#settings-profile-id").val(sessionStorage.userId);
	$("#settings-profile-page .inputs")
		.html(makeSettingsProfileInputs(d.result[0]));
}
const SettingsmarketProfilePage = async() => {
	let d = await query({type:"animal_by_id",params:[sessionStorage.animalId]});

	$("#settings-market-profile-id").val(sessionStorage.animalId);
	$("#settings-market-profile-page .inputs")
		.html(makemarketProfileInputs(d.result[0],'settings-market-profile'));
}



const AddLocationPage = async() => {
	let map_el = await makeMap("#add-location-page .map");

	map_el.data("map").addListener("click",function(e) {
		$("#add-location-lat").val(e.latLng.lat())
		$("#add-location-lng").val(e.latLng.lng())
		makeMarkers(map_el,[{lat:e.latLng.lat(),lng:e.latLng.lng(),icon:'https://via.placeholder.com/40?text=PIN'}])
	})
}

const SettingsProfileUploadPage = async() => {
	let d = await query({type:"user_by_id",params:[sessionStorage.userId]});

	$("#settings-profile-upload-form .image-uploader")
		.css('background-image',`url('${d.result[0].img}')`);
}







const ChooseAnimalPage = async () => {
	let markets = await query({type:'markets_by_user_id',params:[sessionStorage.userId]});

	$("#add-location-animal-id").html(makeSelectOptions(animals.result.map(o=>([o.id,o.name]))));
}

const AddmarketsPage = async(d=0) => {
	$("#add-market-form .inputs").html(makeAnimalProfileInputs({
		name:'',
		type:'',
		breed:'',
		description:''
	},'add-animal'))
}
