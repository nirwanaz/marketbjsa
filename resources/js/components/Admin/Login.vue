<template>
  <div class="container-fluid">
    <div class="row justify-content-center" style="height: 600px">
      <div class="col-md-4 align-self-center">
        <div class="card">
          <div class="card-header">
            <h5>Form Login</h5>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="passwd" id="passwd" class="form-control">
              </div>
              <div class="btn-group">
                <button class="btn btn-success" id="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      account: {}
    }
  },
  created() {
    axios
  }
}
</script>
