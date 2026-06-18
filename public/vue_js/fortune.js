const Fortune = {
    async loadSystems() {
        return await Api.get(
            '/api/fortune-systems'
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