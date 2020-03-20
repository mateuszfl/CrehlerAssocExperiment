import template from './sw-product-detail-base.html.twig';

const { Criteria } = Shopware.Data;

Shopware.Component.override('sw-product-detail-base', {
    template,
    computed: {
        productLinksColumns() {
            return [
                {
                    property: 'id',
                    label: 'id',
                    dataIndex: 'id',
                    routerLink: 'sw.product.detail'
                }
            ];
        },
        productLinksCriteria() {
            return new Criteria(1, 10);
        }
    }
});
