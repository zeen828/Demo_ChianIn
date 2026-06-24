const Fortune = {
    async loadSystems(slug) {
        return await Api.get(
            '/api/fortune/category',
            {
                params: {
                    slug: slug
                }
            }
        );
    },
    async draw(categoryId) {
        return await Api.post(
            '/api/draw-lot',
            {
                category_id: categoryId
            }
        );
    }
};