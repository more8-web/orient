import { Component, OnInit } from '@angular/core';
import { NewsCategory, NewsCategoryList } from "../../context/models";
import { select, Store } from "@ngrx/store";
import { newsCategoryActions, selectNewsCategoryList } from "../../context/store";

@Component({
  selector: 'app-news-category',
  templateUrl: './news-category.component.html',
  styleUrls: ['./news-category.component.css']
})
export class NewsCategoryComponent implements OnInit {

    categories: NewsCategory[];

    constructor(private store: Store) {
    }

    ngOnInit(): void {
        this.store.dispatch(newsCategoryActions.load());
        this.store.pipe(
            select(selectNewsCategoryList)
        ).subscribe(
            data => this.categories = {...data}
        );
    }

}
