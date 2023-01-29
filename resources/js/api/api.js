export default class ApiService {
  /**
   * Constructor function
   *
   * @returns {void}
   */
  constructor() {
    this.promise = null;
    this.headers = {
      'Content-Type': 'application/json',
      Accept: 'application/json',
    };
    this.baseUrl = '/api/';
  }
}