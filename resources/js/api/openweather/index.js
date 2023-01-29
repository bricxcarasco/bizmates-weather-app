import axios from 'axios';
import ApiService from '../api';

export default class OpenWeatherApiService extends ApiService {
  
  /**
   * Get city weather results from Open Weather Mapa API
   * 
   * Method: POST
   * Endpoint: /api/weather
   *
   * @param {Object} data
   * @returns {Promise}
   */
  getWeather(data) {
    this.promise = axios.post(
      `${this.baseUrl}weather`,
      data,
      {
        headers: this.headers,
      }
    );

    return this.promise;
  }
}
