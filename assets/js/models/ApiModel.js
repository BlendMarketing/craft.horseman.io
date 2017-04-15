import uriTemplate from "uri-templates";
import config from "config";
import { Model } from "backbone";

export default class ApiModel extends Model {

    /**
     * getRelation process a link href and returns a collection of results
     *
     * @param {string} name       The name of the link to follow
     * @param {object} home       The Home for the result, can be a collection
     * or a model
     * @param {object} options
     *
     * @return {Promise}
     *
     */
    getRelation(name, home, options) {
        this.setRelationshipUrl(name, home, options.params);

        return home.fetch();
    }

    /**
     * createRelation process a link href and create the resource on the
     * server.
     *
     * @param {string} name    The name of the link to follow
     * @param {object} home    The Home for the result, must be a model.
     * @param {object} options
     *
     * @return {Promise}
     */
    createRelation(name, home, options, callbacks) {
        options = options || {};
        callbacks = callbacks || {};
        let params = typeof options.params === "undefined" ? options.params : {};
        this.setRelationshipUrl(name, home, params);

        return home.save({}, callbacks);
    }

    /**
     * Establish the url on the object representing its uri on the server.
     * We assume an RFC 6570 formatted url will be presented
     *
     * @param {string} name The name of the relation
     * @param {object} home This object have the url set on it
     * @param {params} home The params to use when templating the url
     */
    setRelationshipUrl(name, home, params) {
        let t = uriTemplate(config.apiUrl + this.attributes._links[name].href);
        let linkUrl = t.fill(params);

        //Set the link url on the model
        home.url = linkUrl;
    }

    /**
     * Follow a link on each item and attach the result to each item on the
     * collection.
     *
     * @param {string}   name The name of the link to follow
     * @param {function} home The object where the returned value will live, in
     * function form. The object will be initialized for each link followed
     * @param {object}   options Will be passed along, are `on` which will
     * attach an event listener to each returned model.
     *
     * @return {Promise}
     *
     */
    attach(name, home, options) {

        this.listenToOnce(home, "update", function(){
            this.set(name, home);
        });

        return this.getRelation(name, home, options);
    }

    /**
     * Return the embeded relationship identified by the key supplied.
     *
     * @param {string} The name of the relationship to fetch from the embedded
     * data
     *
     * @return {mixed}
     */
    getEmbeddedData(name) {
        return this.get("_embedded")[name];
    }
}
