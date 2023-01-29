import axios from 'axios';
import ApiService from '../api';

export default class FourSquareApiService extends ApiService {
  
  /**
   * Search city geo location based on query parameter tring
   *
   * Method: POST
   * Endpoint: /api/city_geo_location
   * 
   * @param {String} city
   * @returns {Promise}
   */
  searchCityGeoLocation(data) {
    this.promise = axios.post(
      `${this.baseUrl}city_geo_location`,
      data,
      {
        headers: this.headers,
      }
    );

    return this.promise;
  }
}
