<template>
  <div class="">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Add Custom Run
    </button>
    <button type="button" class="btn btn-info" @click="showRunsData()" name="button">Show Runs Data</button>
    <legend>Runs table</legend>
    <table class="table table-sm" v-if="runs_data != null">
      <thead>
        <tr >
          <th scope="col">Upload Name</th>
          <th scope="col">Upload Time</th>
          <th scope="col">User Uploaded By</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item,ind) in runs_data.data" :key="ind" v-if="item != null">
          <td>{{item.run_name}}</td>
          <td>{{item.created_at}}</td>
          <td>{{item.last_modified_by_user_name}}</td>
        </tr>

      </tbody>
    </table>
    <nav aria-label="Page navigation example" v-if="runs_data != null">
  <ul class="pagination">
    <li class="page-item" :class="{'disabled': runs_data.prev_page_url == null}"><a class="page-link" disable href="#" @click.prevent="goToPrevious(runs_data.prev_page_url)">Previous</a></li>
    <li class="page-item" :class="{'disabled': runs_data.next_page_url == null}"><a class="page-link" href="#" @click.prevent="goToNext(runs_data.next_page_url)">Next</a></li>
  </ul>
</nav>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Custom Run</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form" method="post">
              <div class="form-group">
                <label for="json_data">Json Data</label>
                <textarea name="json_data" id="json_data" class="form-control" placeholder="Past Json Data" rows="10"  cols="80" v-model="json_data"></textarea>
              </div>
              <div class="form-group">
                <label for="json_data">Counter</label>
                <input type="number" class="form-control" name="counter" max="25000" placeholder="Conter" v-model="counter">
              </div>
            </form>

            <file-reader
            accept=".js"
            output="text"
            @reader-load="json_data = $event.data"
            >
            <template
            #reader="props"
            >
            <input
            type="file"
            :accept="props.accept"
            @change="props.onchange"
            class="btn btn-info"
            title="Upload Json Data"
            />
          </template>
        </file-reader>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="onSubmit()" data-dismiss="modal">Upload Data</button>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
import axios from 'axios'
import FileReader from 'vue-filereader'
export default {
  data(){
    return {
      base_url: '',
      json_data:null,
      counter:1,
      runs_data: null
    };
  },
  components: {
    FileReader
  },
  mounted() {
    this.base_url = $('#base_url').val();
    // console.log(this.json_data);
  },
  methods:{
    onSubmit(){
      try {
        let data = null;
        data = JSON.parse(this.json_data);
        // console.log(data.observations);
        // return ;
        // check for input fiedls
        if (this.counter <= 0 || this.counter > 25000 || this.json_data == null) {
          alert('Please check input fields');
          return;
        }
        // now finally make axios request to send the data
        axios.post(this.base_url+'/insert-data',{
          json_data: data,
          counter: this.counter
        })
        .then((res)=> {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        })

      } catch (e) {
        alert('Invalid Json Data');
      }
    },
    showRunsData(){
      // now show the runs table data
      axios.get(this.base_url+'/runs')
      .then((res)=> {
        // console.log(res.data);
        this.runs_data = res.data;
      })
      .catch((err) => {
        console.log(err);
      })
    },
    goToNext(nexturl){
      axios.get(nexturl)
      .then((res)=> {
        // console.log(res.data);
        this.runs_data = res.data;
      })
      .catch((err) => {
        console.log(err);
      })
    },
    goToPrevious(preturl){
      axios.get(preturl)
      .then((res)=> {
        // console.log(res.data);
        this.runs_data = res.data;
      })
      .catch((err) => {
        console.log(err);
      })
    }
  }
}
</script>
