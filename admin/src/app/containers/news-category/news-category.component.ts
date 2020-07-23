import { Component, OnInit } from '@angular/core';

import { NewsCategory } from "@context/models";
import { NewsCategoryDispatcher, NewsCategorySelectors, } from "../../context/store";

@Component({
  selector: 'app-news-category',
  templateUrl: './news-category.component.html',
  styleUrls: ['./news-category.component.css']
})
export class NewsCategoryComponent implements OnInit {

    categories: NewsCategory[];

    constructor(private selector: NewsCategorySelectors,
                private dispatcher: NewsCategoryDispatcher) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.selector.list().subscribe(data => this.categories = [...data]);

    }

}
