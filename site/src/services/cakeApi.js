import { cakeApi } from "./api";

export default {
	listSites() {
		const response = cakeApi().get('/sites')
		.catch((error) => {
			return error.response;
		});
		return response;
	}
}