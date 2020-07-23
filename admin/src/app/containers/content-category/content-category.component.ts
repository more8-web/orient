import { Component, OnInit } from '@angular/core';

import { ContentCategory } from "@context/models";
import { ContentCategoryDispatcher, ContentCategorySelectors, } from "@context/store/content-category";

@Component({
  selector: 'app-content-category',
  templateUrl: './content-category.component.html',
  styleUrls: ['./content-category.component.css']
})
export class ContentCategoryComponent implements OnInit {

    categories: ContentCategory[];

    constructor(private selector: ContentCategorySelectors,
                private dispatcher: ContentCategoryDispatcher) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.selector.list().subscribe(data => this.categories = [...data]);

    }

}
