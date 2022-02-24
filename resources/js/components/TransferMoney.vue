<template>
	<form v-on:submit.prevent="save">
		<div class="mb-3">
			<label>Email Address</label>
			<input type="email" class="form-control" :class="{ 'is-invalid': errors.email }" step="0.01" placeholder="Enter email" v-model="email" required />
			<div class="invalid-feedback">{{ errors.email ? errors.email[0] : "" }}</div>
		</div>
		<div class="mb-4">
			<label>Amount</label>
			<input type="number" class="form-control" :class="{ 'is-invalid': errors.amount }" placeholder="Enter amount to deposit" v-model="amount" :min="1" required />
			<div class="invalid-feedback">{{ errors.amount ? errors.amount[0] : "" }}</div>
		</div>
		<div class="d-grid gap-2">
			<button class="btn btn-primary btn-block" type="submit" :disabled="loading">{{ loading ? "Please wait" : "Transfer" }}</button>
		</div>
	</form>
</template>

<script>
export default {
	data() {
		return {
			email: "",
			amount: "",
			errors: {},
			loading: false,
		};
	},
	methods: {
		save() {
			this.loading = true;
			axios
				.post("/transfer", {
					amount: this.amount,
					email: this.email,
				})
				.then((response) => {
					this.amount = "";
					this.email = "";
					this.loading = false;
					toastr.success(response.data.message);
				})
				.catch((e) => {
					this.loading = false;
					this.errors = _.get(e, "response.data.errors", {});
					toastr.error("Couldn't transfer money");
				});
		},
	},
};
</script>
