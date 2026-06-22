const Fortune = {
    async loadSystems(slug) {
        return await Api.get(
            '/api/fortune-systems',
            {
                params: {
                    slug: slug
                }
            }
        );
    },
    async draw(systemId) {
        return await Api.post(
            '/api/draw-lot',
            {
                system_id: systemId
            }
        );
    }
};