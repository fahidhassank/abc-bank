<template>
	<form v-on:submit.prevent="save">
		<div class="mb-4">
			<label>Amount</label>
			<input type="number" class="form-control" :class="{ 'is-invalid': errors.amount }" step="0.01" placeholder="Enter amount to withdraw" v-model="amount" :min="1" required />
			<div class="invalid-feedback">{{ errors.amount ? errors.amount[0] : "" }}</div>
		</div>
		<div class="d-grid gap-2">
			<button class="btn btn-primary btn-block" type="submit" :disabled="loading">{{ loading ? "Please wait" : "Withdraw" }}</button>
		</div>
	</form>
</template>

<script>
export default {
	data() {
		return {
			amount: "",
			errors: {},
			loading: false,
		};
	},
	methods: {
		save() {
			this.loading = true;
			axios
				.post("/withdraw", {
					amount: this.amount,
				})
				.then((response) => {
					this.amount = "";
					this.loading = false;
					toastr.success(response.data.message);
				})
				.catch((e) => {
					this.loading = false;
					this.errors = _.get(e, "response.data.errors", {});
					toastr.error("Couldn't withrdaw money");
				});
		},
	},
};
</script>
