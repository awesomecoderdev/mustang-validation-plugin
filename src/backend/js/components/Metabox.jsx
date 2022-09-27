import React, { Component } from 'react';
import { ajaxurl, mustang, metaFields,states } from './Backend';
import { RefreshIcon } from '@heroicons/react/outline';
import axios from 'axios';
import { bind } from 'lodash';

class Metabox extends Component {

    constructor(props) {
        super(props)

        this.state = {
            refresh: false,
            featch: "",
			mustang_app_icon: states?.mustang_app_icon,
			mustang_app_downloads: states?.mustang_app_downloads,
			mustang_app_stars: states?.mustang_app_stars,
			mustang_app_ratings: states?.mustang_app_ratings,
			mustang_app_devName: states?.mustang_app_devName,
			mustang_app_devLink: states?.mustang_app_devLink,
			mustang_app_compatible_with: states?.mustang_app_compatible_with,
			mustang_app_size: states?.mustang_app_size,
			mustang_app_last_version: states?.mustang_app_last_version,
			mustang_app_link: states?.mustang_app_link,
			mustang_app_price: states?.mustang_app_price,
        }

        this.handleFeatchData = this.handleFeatchData.bind(this);
        this.handleChange = this.handleChange.bind(this);
    }

    handleFeatchData = () => {
        const theTitle = document.querySelector("h1.wp-block.wp-block-post-title");
        const title = document.getElementById("title");

        const self = this;
        self.setState({refresh : true});

        axios.post(ajaxurl, {
          app: self.state?.featch,
        })
        .then(function (res) {
          const response = res.data;
            self.setState({
                mustang_app_icon : response?.icon,
                mustang_app_downloads : response?.downloads,
                mustang_app_stars : response?.stars,
                mustang_app_ratings : response?.ratings,
                mustang_app_devName : response?.devName,
                mustang_app_devLink : response?.devLink,
            })
            theTitle.textContent=response?.name;
            if(title){
                theTitle.value=response?.name;
            }

            if(response?.name !==""){
                self.setState({
                    mustang_app_link: self.state?.featch,
                })
            }

            self.setState({refresh : false})
        })
        .catch(function (err) {
            self.setState({refresh : false})
        });
    }

    handleChange =(name,event) => {
        //more logic here as per the requirement
        this.setState({
            [name]: event.target.value,
        });
    };

    render() {
        return (
            <>
                <div className="full flex relative my-1 justify-between">
                    <input
                     onChange={event => this.handleChange( "featch", event)}
                     value={this.state?.featch}
                     placeholder="PlayStore App Url" type="text"
                     className="mustang_app_url block w-screen p-3 border-gray-300/10 shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-primary-300/0 focus:ring focus:ring-primary-200/0 focus:ring-opacity-50" />
                    <span onClick={this.handleFeatchData} className="bg-primary-400 flex justify-around items-center w-1/5 cursor-pointer rounded-r-md">
                        <span className="md:block hidden text-white font-semibold text-sm pointer-events-none ">
                            Featch Data
                        </span>
                        <RefreshIcon className={ this.state?.refresh ? "animate-spin pointer-events-none h-6 w-6 text-white font-semibold text-sm" : "pointer-events-none h-6 w-6 text-white font-semibold text-sm" } />
                    </span>
                </div>
                <div className="grid lg:grid-cols-3 md:grid-cols-2 ">
                    {metaFields.map((field, i) => {
                        return(
                            <div key={field?.name} className="full relative my-1">
                                <div className="relative rounded-md ">
                                    <p className="mb-1 italic text-slate-800 text-xs font-light">
                                        {field?.label}
                                    </p>
                                    <input onChange={event => this.handleChange( field?.name, event)}
                                    placeholder={field?.placeholder}
                                    value={this.state[field?.name]}
                                    type={ field?.type}
                                    name={field?.name}
                                    className="block p-3 border-gray-300/10 shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 rounded-md " />
                                </div>
                            </div>
                        )
                    })}
                </div>
            </>
        );
    }
}

export default Metabox;
