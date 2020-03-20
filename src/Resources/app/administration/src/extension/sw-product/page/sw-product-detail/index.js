Shopware.Component.override('sw-product-detail', {
    created() {
        this.createdComponent();
    },
    computed: {
        productCriteria() {
            const criteria = this.$super('productCriteria');
            criteria.addAssociation('productLinks');
            return criteria;
        },
    }
});
