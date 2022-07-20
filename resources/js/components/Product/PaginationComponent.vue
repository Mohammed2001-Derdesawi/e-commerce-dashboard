<template>
    <div class="col-sm-12 col-md-7 d-flex align-items-centerjustify-content-center justify-content-md-end" v-if="pagination.last_page > 1">
        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="kt_table_users_previous" v-if="pagination.current_page > 1">
                    <a href="javascript:void(0)" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0"
                        class="page-link" v-on:click.prevent="changePage(pagination.current_page - 1)">
                        <i class="previous"></i>
                    </a>
                </li>

                <li class="paginate_button page-item" v-for="page in pagesNumber" :key="page" :class="{ 'active': page == pagination.current_page }">
                    <a href="javascript:void(0)" aria-controls="kt_table_users" class="page-link" v-on:click.prevent="changePage(page)">{{ page }}</a>
                </li>

                <li class="paginate_button page-item next" id="kt_table_users_next" v-if="pagination.current_page < pagination.last_page">
                    <a href="javascript:void(0)" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0"
                    class="page-link" v-on:click.prevent="changePage(pagination.current_page + 1)"><i class="next"></i></a>
                </li>
            </ul>
        </div>
    </div>
</template>


<script>
export default {
    name:'PaginationComponent',

    props: {
        pagination: {
            type: Object,
            required: true
        },
        offset: {
            type: Number,
            default: 4
        }
    },

    // props:['pagination','offset'],
        
    computed: {
      pagesNumber() {
        if (!this.pagination.to) {
          return [];
        }
        let from = this.pagination.current_page - this.offset;
        if (from < 1) {
          from = 1;
        }
        let to = from + (this.offset * 2);
        if (to >= this.pagination.last_page) {
          to = this.pagination.last_page;
        }
        let pagesArray = [];
        for (let page = from; page <= to; page++) {
          pagesArray.push(page);
        }
          return pagesArray;
      }
    },
    methods : {
      changePage(page) {
        this.pagination.current_page = page;
        this.$emit('paginate');
      }
    }
}
</script>